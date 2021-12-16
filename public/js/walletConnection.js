// import { ethers } from "ethers.js";
// await ethereum.request({ method: "eth_requestAccounts" });

// let userFeedback;


window.addEventListener("load", async()=>{
    // connect to wallet
    const connectWalletBtn = document.querySelector("#connectToWallet");
    connectWalletBtn.addEventListener("click", async() => {
        const provider = new ethers.providers.Web3Provider(window.ethereum);
        await provider.send("eth_requestAccounts", []);
        const signer = provider.getSigner();
    });
})