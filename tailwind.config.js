module.exports = {
    purge: ["./app/**/*.php", "./resources/**/*.php"],
    theme: {
        spinner: (theme) => ({
            default: {
                color: "#dae1e7",
                size: "1em",
                border: "2px",
                speed: "500ms",
            },
        }),
    },

    variants: {
        spinner: ["responsive"],
    },

    plugins: [
        require("tailwindcss-spinner")({
            className: "spinner",
            themeKey: "spinner",
        }),
    ],
};
