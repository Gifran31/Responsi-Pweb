<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shinobi Arena: Ultimate Jutsu Showdown!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00aeff;
            margin: 0;
            padding: 20px;
        }
        .ninja-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .ninja {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px;
            width: calc(33% - 40px);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .ninja h2 {
            font-size: 20px;
            margin: 0 0 10px;
        }
        .ninja img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
            max-height: 200px;
        }
        .ninja p {
            margin: 5px 0;
        }
        .buy-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buy-button[disabled] {
            background-color: #aaa;
            cursor: not-allowed;
        }
        .purchased-list {
            margin-top: 40px;
            background: white;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .purchased-list h2 {
            text-align: center;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var buttons = document.querySelectorAll(".buy-button");

            buttons.forEach(function(button) {
                var ninjaName = button.previousElementSibling.value;

                if (sessionStorage.getItem(ninjaName)) {
                    button.disabled = true;
                    button.textContent = "Purchased";
                }

                button.addEventListener("click", function() {
                    button.disabled = true;
                    button.textContent = "Purchased";
                    sessionStorage.setItem(ninjaName, "purchased");
                });
            });
        });
    </script>
</head>
<body>
    <h1>Shinobi Arena: Ultimate Jutsu Showdown!</h1>

    <?php
    session_start();

    $ninjas = [
        ["name" => "Naruto Uzumaki", "HP" => "100%", "Ninjutsu" => "Rasengan", "Taijutsu" => "100%", "image" => "Naruto.jpeg", "harga" => "50 ¥"],
        ["name" => "Sasuke Uchiha", "HP" => "100%", "Ninjutsu" => "Chidori", "Taijutsu" => "100%", "image" => "Sasuke .jpeg", "harga" => "60 ¥"],
        ["name" => "Kakashi Hatake", "HP" => "100%", "Ninjutsu" => "Raikiri", "Taijutsu" => "100%", "image" => "Kakashi.jpeg", "harga" => "55 ¥"],
        ["name" => "Gaara", "HP" => "100%", "Ninjutsu" => "Sand Coffin", "Taijutsu" => "100%", "image" => "Gaara.jpeg", "harga" => "45 ¥"],
        ["name" => "Rock Lee", "HP" => "100%", "Ninjutsu" => "Eight Gates", "Taijutsu" => "100%", "image" => "Rock Lee.jpeg", "harga" => "45 ¥"],
        ["name" => "Tenten", "HP" => "100%", "Ninjutsu" => "Soshoryuu", "Taijutsu" => "100%", "image" => "Tenten.jpeg", "harga" => "35 ¥"],
        ["name" => "Neji Hyuga", "HP" => "100%", "Ninjutsu" => "Hakke Rokujoyon Sho", "Taijutsu" => "100%", "image" => "Neji.jpeg", "harga" => "65 ¥"],
        ["name" => "Hinata Hyuga", "HP" => "100%", "Ninjutsu" => "Hakke Rokujoyon Sho", "Taijutsu" => "100%", "image" => "Hinata.jpeg", "harga" => "67 ¥"],
        ["name" => "Kankuro", "HP" => "100%", "Ninjutsu" => "Hakke Rokujoyon Sho", "Taijutsu" => "100%", "image" => "Kankuro.jpeg", "harga" => "87 ¥"],
        ["name" => "Temari", "HP" => "100%", "Ninjutsu" => "Hakke Rokujoyon Sho", "Taijutsu" => "100%", "image" => "Temari.jpeg", "harga" => "59 ¥"],
        ["name" => "Itachi Uchiha", "HP" => "100%", "Ninjutsu" => "Hakke Rokujoyon Sho", "Taijutsu" => "100%", "image" => "itachi.jpeg", "harga" => "88 ¥"],
        ["name" => "Madara Uchiha", "HP" => "100%", "Ninjutsu" => "Hakke Rokujoyon Sho", "Taijutsu" => "100%", "image" => "Madara.jpeg", "harga" => "100 ¥"]
    ];

    // Cek daftar ninja yang sudah dibeli
    $purchased_ninjas = isset($_SESSION["purchased_ninjas"]) ? $_SESSION["purchased_ninjas"] : [];
    ?>

    <div class="ninja-list">
        <?php foreach ($ninjas as $ninja): ?>
        <div class="ninja">
            <img src="<?php echo htmlspecialchars($ninja["image"]); ?>" alt="<?php echo htmlspecialchars($ninja["name"]); ?>">
            <h2><?php echo htmlspecialchars($ninja["name"]); ?></h2>
            <p>HP: <?php echo htmlspecialchars($ninja["HP"]); ?></p>
            <p>Ninjutsu: <?php echo htmlspecialchars($ninja["Ninjutsu"]); ?></p>
            <p>Taijutsu: <?php echo htmlspecialchars($ninja["Taijutsu"]); ?></p>
            <p>Harga: <?php echo htmlspecialchars($ninja["harga"]); ?></p>
            <form action="buy_ninja.php" method="POST">
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($ninja["name"]); ?>">
                <button class="buy-button" type="submit" <?php if (in_array($ninja["name"], $purchased_ninjas)) echo "disabled"; ?>><?php if (in_array($ninja["name"], $purchased_ninjas)) echo "Purchased"; else echo "Buy"; ?></button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="purchased-list">
        <h2>Purchased Ninjas</h2>
        <?php
        // Baca konten file pembelian dan tampilkan
        $filename = "purchased_ninjas.txt";
        if (file_exists($filename)) {
            $file_content = file_get_contents($filename);
            echo nl2br(htmlspecialchars($file_content));
        } else {
            echo "No ninjas purchased yet.";
        }
        ?>
    </div>
</body>
</html>
