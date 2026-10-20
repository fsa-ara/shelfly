import { spawn } from "node:child_process";
import { loadEnv } from "./config.js";

loadEnv();

const { APP_URL } = process.env;

const children = [];

let viteStarted = false;
let isKilled = false;

const start = () => {
    children.push(
        spawn("node", ["server/proxy.js"], {
            env: {
                ...process.env,
                APP_URL,
                PROXY_PORT: 3000,
                NODE_OPTIONS: "--use-system-ca",
            },
            detached: true,
            stdio: "inherit",
        }),
    );

    const tunnel = spawn(
        "cloudflared",
        ["tunnel", "--url", "http://localhost:3000"],
        {
            detached: true,
            stdio: "pipe",
        },
    );

    tunnel.stderr.on("data", (data) => {
        const output = data.toString();
        const match = output.match(/https:\/\/[^\s]*trycloudflare\.com/);

        if (match && !viteStarted) {
            console.log("Tunnel URL: ", match[0]);

            children.push(
                spawn("node", ["server/vite.js"], {
                    env: {
                        ...process.env,
                        TUNNEL_URL: match[0],
                    },
                    detached: true,
                    stdio: "inherit",
                }),
            );

            viteStarted = true;
        }
    });

    children.push(tunnel);
};

process.on("SIGINT", () => {
    if (isKilled) return;

    isKilled = true;

    for (const child of children) {
        if (child && child.exitCode === null) {
            child.kill("SIGTERM");
        }
    }
});

if (process.argv.includes("start")) start();
