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
        게시판 | 134130
    </title>
</head>

<body>
    <div class="header">
    </div>

    <div class="container">
        <article class="boardArticle">
            <h2>게시판</h2>
            <table class="b_table">
                <thead>
                    <tr>
                        <th scope="col" class="b_no">번호</th>
                        <th scope="col" class="b_title">제목</th>
                        <th scope="col" class="b_writer">작성자</th>
                        <th scope="col" class="b_created">작성일</th>
                        <th scope="col" class="b_visited">조회</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$sql = 'select * from board order by b_no desc';
						$result = $db->query($sql);
						while($row = $result->fetch_assoc())
						{
							$datetime = explode(' ', $row['b_created']);
							$date = $datetime[0];
							$time = $datetime[1];
							if($date == Date('Y-m-d'))
								$row['b_created'] = $date;
							else
								$row['b_created'] = $time;
					?>
                    <tr>
                        <td class="b_no"><?php echo $row['b_no']?></td>
                        <td class="b_title"><?php echo $row['b_title']?></td>
                        <td class="b_writer"><?php echo $row['b_writer']?></td>
                        <td class="b_created"><?php echo $row['b_created']?></td>
                        <td class="b_visited"><?php echo $row['b_visited']?></td>
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
