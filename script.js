document.getElementById('pickGame').addEventListener('click', () => {
  fetch('random_game.php')
    .then(response => {
      if (!response.ok) {
        throw new Error(`Server returned ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      if (data.success) {
        const game = data.random_game;
        const name = game.name ?? 'Unknown Game';
        const appid = game.appid;
        const imgUrl = `https://cdn.akamai.steamstatic.com/steam/apps/${appid}/header.jpg`;
        const storeUrl = `https://store.steampowered.com/app/${appid}/`;

        document.getElementById('output').innerHTML = `
          <div class="game-card">
            <img src="${imgUrl}" alt="${name}" class="game-img">
            <div class="game-info">
              <h2>${name}</h2>
              <p>Playtime: ${Math.round(game.playtime_forever / 60)} hours</p>
              <a href="${storeUrl}" target="_blank" class="steam-link">View on Steam</a>
            </div>
          </div>
        `;
      } else {
        document.getElementById('output').textContent = 'No games found or error.';
      }
    })
    .catch(err => {
      console.error(err);
      document.getElementById('output').textContent = 'Error fetching data from server.';
    });
});

  