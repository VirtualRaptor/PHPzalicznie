import React from "react";
import ReactDOM from "react-dom/client";
import JokeContainer from "./components/JokeContainer";
import Leaderboard from "./components/Leaderboard";

function Layout() {
  return (
    <>
      <JokeContainer />
      <Leaderboard />
    </>
  );
}

export default Layout;

if (document.getElementById("main")) {
  const Index = ReactDOM.createRoot(document.getElementById("main"));

  Index.render(
    <React.StrictMode>
      <Layout />
    </React.StrictMode>
  );
}
