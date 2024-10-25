<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div>

        <p id="question"></p>

        <p id="number"></p>

        <button id="answer1" onclick="" value="0"> </button>

        <button id="answer2" onclick="" value="1"> </button>

        <button id="answer3" onclick="" value="2"> </button>

        <button id="answer4" onclick="" value="3"> </button>
    </div>

</body>

<script>
   
   $(document).ready() => {
        $.ajax({
            type: "POST",
            url: "quiz_process.php",
            dataType: "json",
            encode: true,
        }).done(({data}) => {

            $(#question).html(question)
            $(#answer1).html(answer1)
            $(#answer2).html(answer2)
            $(#answer3).html(answer3)
            $(#answer4).html(answer4)

        })
    
   }

   


</script>

</html>