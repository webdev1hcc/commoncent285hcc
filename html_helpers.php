<?php
/* file: /var/www/docs/include/vern/common/html_helpers.php */

  /* 
    This function will make a text box for a HTML form.
    $data is an associative array that contains
    the following:  $data['prompt] is a string that
    serves as the prompt.  $data['name'] is a string that
    has the name of the text box element.
  */
  function makeTextBox($data)
  {
    $prompt = $data['prompt'];
    $name = $data['name'];
    $temp = "      $prompt \n";
    $temp .= "      <input type=\"text\" name=\"$name\"><br />\n";
    return $temp;
  }
  
  /*
    This function makes a radio button question.  $data
    is an associative array with $data['prompt'] containing
    the prompt. $data['name'] is the name for the radio 
    button element. $data['orientation'] is set to 
    'vertical' for buttons that are vertically oriented.  
    Otherwise the buttons are layed out horizontally.
    $data['choiceArray'] is a two dimensional array.  Each row
    of this array contains the [value][display] for each choice.
  */
  function makeRadioButton($data)
  {
    $prompt = $data['prompt'];
    $name = $data['name'];
    $orientation = $data['orientation'];
    $choiceArray = $data['choiceArray'];
    $temp = "      $prompt<br />\n";
    for ($i = 0; $i < count($choiceArray); $i++) {
      $temp .= "      <input type=\"radio\" name=\"$name\" " .
        "value=\"" . $choiceArray[$i][0] . "\">" .
        $choiceArray[$i][1];
      if ($orientation == 'vertical') {
        $temp .= "<br />";
      }
      $temp .= "\n";
    }
    $temp .= "      <br />\n";
    return $temp;
  }
  
  /*
    This function makes a TextArea.  $data['prompt']
    contains the prompt.  $data['name'] contains the
    name for the textarea element.  The variables
    $cols, $rows, and $value have default values.  If
    $data['cols'] is defined in $data, that value 
    will override the default value for $cols, etc.
    This is a way of providing default values for
    optional parameters without having to worry about
    the order.  
  */
  function makeTextArea($data)
  {
    $prompt = $data['prompt'];
    $name = $data['name'];
    $cols = 60;  // default width of 60 columns
    $rows = 5; // default height of 5 rows
    $value = ""; // default is empty textarea
    if (!empty($data['cols'])) {
      $cols = $data['cols'];
    }
    if (!empty($data['rows'])) {
      $rows = $data['rows'];
    }
    if (!empty($data['value'])) {
      $value = $data['value'];
    }
    $temp = "      $prompt<br />\n";
    $temp .= "      <textarea name=\"$name\" cols=\"$cols\" ".
      "rows=\"$rows\">$value</textarea><br /><br />\n";
    return $temp;
  }
?>
