
<section>
    <h2>Public Posts</h2>
    <?php
        foreach($publicPosts as $row) {
            $content = $row->content;
            $currentDateTime = $row->date;
            $username = $row -> username;

            echo "Admin Username: " . $username;
            echo "<br>";
            echo "Date: " . $currentDateTime;
            echo "<br>";
            echo "Content: " . $content;
            echo "<br>";
            echo "<br>";
        }
    ?>
</section>