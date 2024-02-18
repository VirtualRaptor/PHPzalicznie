const LeaderboardRow = ({ user, rank }) => {
  return (
    <tr>
      <td>{rank}</td>
      <td>{user.name}</td>
      <td>{user.points}</td>
    </tr>
  );
};

export default LeaderboardRow;
