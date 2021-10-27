<?php
if ((isset($_POST["dataEntered"])) && ($_POST["dataEntered"] == "Yes"))
echo "Hello! " . $_POST["name"] . " " . $_POST["surname"];
else
{
?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form1" id="form1">
        <table>
          <tr>
            <td>Name:</td>
            <td><input name="name" type="text" id="name" value="" size="32" /></td>
          </tr>
          <tr>
            <td>Surname:</td>
            <td><input name="surname" type="text" id="surname" value="" size="32" /></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" value="Send Form" /></td>
          </tr>
        </table>
        <input type="hidden" name="dataEntered" value="Yes" />
      </form>
 <?php
}
?> 