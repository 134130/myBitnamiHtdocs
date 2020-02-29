<?php
    require_once("../dbconfig.php");
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image" href="favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans|Nanum+Gothic|Noto+Sans+KR|Open+Sans:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>
        방명록 | 134130
    </title>
</head>

<body>
    <div class="header">
    </div>

    <div class="container">
        <article class="chatArticle">
            <h2>방명록</h2>
            <form method="POST" action="php/chat_write.php" class="c_form">
                <input type="text" name="c_content" placeholder=" content">
                <input type="text" name="c_writer" maxlength="11" placeholder=" name">
                <input type="submit">
            </form>

            <table class="c_table">
                <thead>
                    <tr>
                        <th scope="col" class="c_no">번호</th>
                        <th scope="col" class="c_content">내용</th>
                        <th scope="col" class="c_writer">작성자</th>
                        <th scope="col" class="c_created">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$sql = 'select * from chat order by c_no desc';
						$result = $db->query($sql);
						while($row = $result->fetch_assoc())
						{
							$datetime = explode(' ', $row['c_created']);
							$date = $datetime[0];
							$time = $datetime[1];
							if($date == Date('Y-m-d'))
								$row['c_created'] = $date;
							else
								$row['c_created'] = $time;
					?>
                    <tr>
                        <td class="c_no"><?php echo $row['c_no']?></td>
                        <td class="c_content"><?php echo $row['c_content']?></td>
                        <td class="c_writer"><?php echo $row['c_writer']?></td>
                        <td class="c_created"><?php echo $row['c_created']?></td>
                    </tr>
                    <?php
						}
					?>
                </tbody>
            </table>
        </article>
    </div>

    <div class="footer">
    </div>

</body>

</html>
