function Gameboard() {
  let board = ["", "", "", "", "", "", "", "", ""];
  function getBoard() {
    return board;
  }
  function setMark(index, mark) {
    if (board[index] === "") {
      board[index] = mark;
      return true;
    }
    return false;
  }
  function resetBoard() {
    board = ["", "", "", "", "", "", "", "", ""];
  }
  return { getBoard, setMark, resetBoard };
}

function createPlayer(name, mark) {
  let playerName = name;
  let playerMark = mark;
  function getName() {
    return playerName;
  }
  function getMark() {
    return playerMark;
  }
  function setName(newName) {
    playerName = newName;
  }
  return { getName, getMark, setName };
}

const gameController = (function () {
  const gameboard = Gameboard();
  const player1 = createPlayer("Player 1", "X");
  const player2 = createPlayer("Player 2", "O");
  let currentPlayer = player1;

  const checkWin = function () {
    const board = gameboard.getBoard();
    const winConditions = [
      [0, 1, 2],
      [3, 4, 5],
      [6, 7, 8], 
      [0, 3, 6],
      [1, 4, 7],
      [2, 5, 8], 
      [0, 4, 8],
      [2, 4, 6], 
    ];
    for (let condition of winConditions) {
      const [a, b, c] = condition;
      if (board[a] && board[a] === board[b] && board[a] === board[c]) {
        return "Win";
      }
    }
    return null;
  };

  

  
  updateDisplay();

  return { updateDisplay };
})();
