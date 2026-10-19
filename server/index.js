import { spawn } from "node:child_process";
import { loadEnv } from "./config.js";

loadEnv();

const { APP_URL, NGROK_URL, PROXY_PORT } = process.env;

const children = [];

let isKilled = false;

const start = () => {
    children.push(
        spawn("node", ["server/vite.js"], {
            env: {
                ...process.env,
                NGROK_URL,
            },
            detached: true,
            stdio: "inherit",
        }),
    );

    children.push(
        spawn("ngrok", ["http", PROXY_PORT], {
            detached: true,
            stdio: "inherit",
        }),
    );

    children.push(
        spawn("node", ["server/proxy.js"], {
            env: {
                ...process.env,
                APP_URL,
                PROXY_PORT,
                NODE_OPTIONS: "--use-system-ca",
            },
            detached: true,
            stdio: "inherit",
        }),
    );
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
