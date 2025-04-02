# 🎮 Steam Game Picker

A simple PHP + JavaScript app that helps you decide what to play by randomly selecting a game from your Steam library.

![Screenshot](screenshot.png)

## 🧩 Features

- 🎲 Picks a random game from your Steam account
- 📊 Displays game name, hours played, and a high-res banner image
- 🔗 Links directly to the game's Steam store page
- 💡 Built using the Steam Web API, PHP, JS, HTML, and CSS
- 🛡️ Keeps your API key private using environment variables

---

## 🛠 Setup Instructions

To run this project locally, you'll need PHP (or XAMPP), Composer, and a Steam Web API key.

### 1. 🔁 Clone the Repository

git clone https://github.com/Sonjy98/SteamRandomGamePicker.git
cd SteamRandomGamePicker

2. 📦 Install Dependencies
Use Composer to install the dotenv library:

composer install
Make sure you have Composer installed on your system.

4. 🔐 Create Your .env File
In the project root, create a .env file that looks like this:

STEAM_API_KEY=your_steam_web_api_key_here
STEAM_ID=your_64bit_steam_id_here
You can get your Steam Web API key here

To find your 64-bit Steam ID, use https://steamid.io

⚠️ Important: Do not commit your .env file to GitHub — it contains private credentials.

4. 🚀 Run the Project
Use XAMPP or any PHP server to serve the project directory.

If using XAMPP:

Place the project inside C:\xampp\htdocs

Start Apache via the XAMPP Control Panel

Visit http://localhost/SteamRandomGamePicker in your browser

📌 Notes
The project uses the GetOwnedGames endpoint from the Steam Web API, with include_appinfo=true to fetch game names and app IDs.

Game banners are pulled from:

https://cdn.akamai.steamstatic.com/steam/apps/{appid}/header.jpg

✅ TODO / Future Improvements
Add filter to only show games with non-zero playtime

Add a “spin again” animation or sound effect

Fetch full game details via the Steam Storefront API

Save previously rolled games

Make it mobile-responsive

🧠 Credits
Made with caffeine and indecision by Sonjy98
Inspired by countless hours of scrolling through Steam and still not knowing what to play.
