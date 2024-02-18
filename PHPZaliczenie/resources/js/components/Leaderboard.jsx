import React, { useEffect, useState } from "react";
import axios from "axios";

const Leaderboard = () => {
  const [leaderboard, setLeaderboard] = useState([]);

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await axios.get(
          "http://localhost:8000/api/get-users-rank/"
        );
        setLeaderboard(response.data);
      } catch (error) {
        console.error(error);
      }
    };

    fetchUsers();
  }, []);

  return (
    <div className="p-5 pt-3 border-orange-500 shadow-xl flex flex-col gap-2 rounded-md border-2 bg-white justify-center items-center w-[80%] text-center">
      <h1 className="text-2xl text-orange-500 font-bold">Leaderboard</h1>
      <div className="flex flex-col gap-2 w-[50%]">
        {leaderboard.map((user, index) => (
          <LeaderboardRow user={user} key={index + 1} />
        ))}
      </div>
    </div>
  );
};

const LeaderboardRow = ({ user }) => {
  return (
    <div className="bg-neutral-100 flex p-2 flex-row shadow-md rounded-md justify-between">
      <div className="flex gap-2">
        <p className="text-orange-500 font-bold">{user.rank}.</p>
        <p className="font-bold">{user.name}</p>
      </div>
      <p className="font-bold text-orange-500">{user.count} jokes</p>
    </div>
  );
};

export default Leaderboard;
