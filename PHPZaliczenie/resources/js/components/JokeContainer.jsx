import React, { useState } from "react";
import { twMerge } from "tailwind-merge";

const JokeContainer = () => {
  const [revealStage, setRevealStage] = useState(0);
  const [joke, setJoke] = useState(null);

  const fetchJoke = async () => {
    const url = "https://dad-jokes.p.rapidapi.com/random/joke";
    const options = {
      method: "GET",
      headers: {
        "X-RapidAPI-Key": "da397b2d5cmsh40ec915acc20899p101adejsnb18d6953b187",
        "X-RapidAPI-Host": "dad-jokes.p.rapidapi.com",
      },
    };

    try {
      const response = await fetch(url, options);
      const result = await response.json();
      setJoke(result.body[0]);
      setRevealStage(1);
    } catch (error) {
      console.error(error);
    }
  };

  const setUserJoke = async () => {
    setRevealStage(2);

    const url = "http://localhost:8000/api/set-user-joke/";
    const options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        user_id: window.user.id,
      }),
    };

    try {
      const response = await fetch(url, options);
      const result = await response.json();
      console.log("setUserJoke", result);
      return result;
    } catch (error) {
      console.error(error);
    }
  };

  const renderJoke = () => {
    switch (revealStage) {
      case 0:
        return (
          <>
            <h1 className="text-xl font-bold text-orange-500">
              Click to show a joke!
            </h1>
            <div className="self-center">
              <button
                onClick={() => {
                  if (window.isAuthenticated) {
                    fetchJoke();
                  } else {
                    window.location.href = window.loginUrl;
                  }
                }}
                className="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
              >
                🎉 Reveal Your Joke 🎉
              </button>
            </div>
          </>
        );
      case 1:
        return (
          <>
            <h1 className="text-2xl font-bold text-orange-500">{joke.setup}</h1>
            <div className="self-center">
              <button
                onClick={() => setUserJoke()}
                className={twMerge(
                  "bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-all",
                  revealStage === 2 && "opacity-0 hidden"
                )}
              >
                See the punchline
              </button>
            </div>
          </>
        );
      case 2:
        return (
          <>
            <h1 className="text-lg font-semibold text-orange-700">
              {joke.setup}
            </h1>
            <h2 className="text-3xl font-bold transition-all duration-1000 delay-200 text-orange-500">
              {joke.punchline}
            </h2>
            <div className="self-center"></div>
          </>
        );
      default:
        return null;
    }
  };

  return (
    <div className="p-10 border-orange-500 shadow-xl flex flex-col gap-2 duration-200 rounded-md border-2 hover:bg-neutral-100 bg-white hover:scale-[101%] hover:shadow-2xl transition-all justify-center items-center w-[80%] text-center">
      {renderJoke()}
    </div>
  );
};

export default JokeContainer;
