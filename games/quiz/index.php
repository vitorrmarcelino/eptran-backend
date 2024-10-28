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

        <button class="answer-btn" id="answer1" value="0"> </button>

        <button class="answer-btn" id="answer2" value="1"> </button>

        <button class="answer-btn" id="answer3" value="2"> </button>

        <button class="answer-btn" id="answer4" value="3"> </button>
    </div>

<script>
   $(document).ready(() => {

        getQuestion()

        $(".answer-btn").each((i, btn) => {
            $(btn).on("click", () => {
                console.log()
                $.ajax({
                    type: "POST",
                    url: "./actions/submit_answer.php",
                    data: {
                        chosen: $(btn).val()
                    },
                    dataType: "json",
                    encode: true,
                }).done((data) => {
                    getQuestion()
                })
            })
        })
    
   })

    function getQuestion() {
        $.ajax({
                type: "POST",
                url: "./actions/get_question.php",
                dataType: "json",
                encode: true,
            }).done((data) => {
                $("#question").html(data.question)
                $("#answer1").html(data.answer1)
                $("#answer2").html(data.answer2)
                $("#answer3").html(data.answer3)
                $("#answer4").html(data.answer4)
            })
    }
</script>

</body>

</html>