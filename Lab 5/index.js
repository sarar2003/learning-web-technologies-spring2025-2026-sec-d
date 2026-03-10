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

  const checkTie = function () {
    const board = gameboard.getBoard();
    if (board.every((cell) => cell !== "")) {
      return "Tie";
    }
    return null;
  };

  function playRound(index) {
    if (gameboard.setMark(index, currentPlayer.getMark())) {
      const result = checkWin() || checkTie();
      if (!result) {
        currentPlayer = currentPlayer === player1 ? player2 : player1;
      }
      return result;
    }
    return null;
  }

  function resetGame() {
    gameboard.resetBoard();
    currentPlayer = player1;
    displayController.updateDisplay();
  }

  function getCurrentPlayer() {
    return currentPlayer;
  }

  function getBoard() {
    return gameboard.getBoard();
  }

  function updatePlayer1Name(newName) {
    player1.setName(newName);
  }

  function updatePlayer2Name(newName) {
    player2.setName(newName);
  }

  return {
    playRound,
    resetGame,
    getCurrentPlayer,
    checkWin,
    checkTie,
    getBoard,
    updatePlayer1Name,
    updatePlayer2Name,
  };
})();

const displayController = (function () {
  const cells = document.querySelectorAll(".cell");
  const message = document.getElementById("message");
  const resetBtn = document.getElementById("resetBtn");
  const player1Input = document.getElementById("player1Input");
  const player2Input = document.getElementById("player2Input");

  cells.forEach((cell, index) => {
    cell.addEventListener("click", () => {
      gameController.playRound(index);
      updateDisplay();
    });
  });

  resetBtn.addEventListener("click", () => {
    gameController.resetGame();
  });

  player1Input.addEventListener("input", (e) => {
    gameController.updatePlayer1Name(e.target.value);
    updateDisplay();
  });

  player2Input.addEventListener("input", (e) => {
    gameController.updatePlayer2Name(e.target.value);
    updateDisplay();
  });

  function updateDisplay() {
    const board = gameController.getBoard();
    cells.forEach((cell, index) => {
      cell.textContent = board[index];
    });
    const result = gameController.checkWin() || gameController.checkTie();
    if (result === "Win") {
      message.textContent = `${gameController
        .getCurrentPlayer()
        .getName()} wins!`;
    } else if (result === "Tie") {
      message.textContent = "It's a tie!";
    } else {
      message.textContent = `${gameController
        .getCurrentPlayer()
        .getName()}'s turn`;
    }
  }

  updateDisplay();

  return { updateDisplay };
})();
