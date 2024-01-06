<?php require_once "Header.php";

if (isset($result)) {
    echo "<div style=\"width: 400px; margin: auto; border: 5px solid $color; text-align: center\">$result</div>";
}
?>

<form style="width: 400px; margin: auto" action="/game" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">First number</label>
        <input type="number" class="form-control" id="exampleInputEmail1" name="firstNum"
               placeholder="Enter first number">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Second number</label>
        <input type="number" class="form-control" id="exampleInputEmail1" name="secondNum"
               placeholder="Enter second number">
    </div>
    <button type="submit" class="btn btn-primary">Calculate</button>
</form>


<?php require_once "Footer.php" ?>
