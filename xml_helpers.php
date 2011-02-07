<?php
  function showXML($data)
  {
    $dataArray = $data['dataArray'];
    $rowname = $data['rowname'];
    $filename = $data['filename'];
    $fields = array_keys($dataArray[0]);
    $numRows = count($dataArray);
    $numCols = count($dataArray[0]);
    header("Content-type: text/xml");
    echo "<?xml version=\"1.0\"?>\n";
    echo "<?xml-stylesheet type=\"text/css\" href=\"$filename\"?>\n";
    echo "<data>\n";
    if (!empty($data['headers'])) {
      echo "  <$rowname>\n";
      for ($i = 0; $i < $numCols; $i++) {
        $tag = $fields[$i];
        echo "    <$tag class=\"header\">$tag</$tag>\n";
      }
      echo "  </$rowname>\n";
    }
    for ($i = 0; $i < $numRows; $i++) {
      echo "  <$rowname>\n";
      for ($j = 0; $j < $numCols; $j++) {
        $tag = $fields[$j];
        echo "    <$tag>" . $dataArray[$i][$fields[$j]] . "</$tag>\n";
      }
      echo "  </$rowname>\n";
    }
    echo "</data>\n";
  }
  function writeCSSFile($data)
  {
    $dataArray = $data['dataArray'];
    $rowname = $data['rowname'];
    $filename = $data['filename'];
    $fields = array_keys($dataArray[0]);
    $numfields = count($fields);
    $outfile = fopen("$filename",'w');
    fwrite($outfile,"/* $filename */\n");
    fwrite($outfile,"data {\n");
    fwrite($outfile,"  display: table;\n");
    fwrite($outfile,"  margin: 5px;\n");
    fwrite($outfile,"}\n");
    fwrite($outfile,"$rowname {\n");
    fwrite($outfile,"  display: table-row;\n");
    fwrite($outfile,"}\n");
    if (!empty($data['headers'])) {
      for ($i = 0; $i < $numfields; $i++) {
        fwrite($outfile,$fields[$i] . "[class=\"header\"]");
        if ($i < $numfields - 1) {
          fwrite($outfile," ,");
        }
      }
      fwrite($outfile," {\n");
      fwrite($outfile,"  display: table-cell;\n");
      fwrite($outfile,"  border: 2px solid;\n");
      fwrite($outfile,"  padding: 2px;\n");
      fwrite($outfile,"  text-align: center;\n");
      fwrite($outfile,"  background: #cccccc;\n");
      fwrite($outfile,"}\n");
    }
    for ($i = 0; $i < $numfields; $i++) {
      fwrite($outfile,$fields[$i]);
      if ($i < $numfields - 1) {
        fwrite($outfile," ,");
      }
    }
    fwrite($outfile," {\n");
    fwrite($outfile,"  display: table-cell;\n");
    fwrite($outfile,"  border: 2px solid;\n");
    fwrite($outfile,"  padding: 2px;\n");
    fwrite($outfile,"}\n");
    fclose($outfile);
  }
?>
