import express from "express";
import { createProxyMiddleware } from "http-proxy-middleware";

const app = express();

const viteProxy = createProxyMiddleware({
    target: `${process.env.APP_URL}:5173`,
    changeOrigin: true,
    secure: true,
    ws: true,
    on: {
        error: (err) => {
            console.error("Vite proxy error: ", err);
        },
    },
});

const siteProxy = createProxyMiddleware({
    target: `${process.env.APP_URL}`,
    changeOrigin: true,
    secure: true,
    xfwd: true,
    on: {
        error: (err) => {
            console.error("Site proxy error: ", err);
        },
    },
});

app.use((req, res, next) => {
    if (
        req.path.startsWith("/@fs") ||
        req.path.startsWith("/@id") ||
        req.path.startsWith("/@vite") ||
        req.path.startsWith("/node_modules") ||
        req.path.startsWith("/resources") ||
        req.path === "/__vite_ping"
    ) {
        return viteProxy(req, res, next);
    }

    next();
});

app.use(siteProxy);

app.listen(process.env.PROXY_PORT, () => {
    console.log(`Proxy listening on port ${process.env.PROXY_PORT}`);
});
