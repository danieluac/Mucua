<?php
namespace Upload;

/**
 *
 */
class upload
{
  private $path,$success=[],$failed=[],$file;
  private $type= ["png","jpeg","jpg"];

  public function setPath($path)
  {
    $this->path = (string) $path;
    return $this;
  }
  public function setFile($file)
  {
    $this->file = (array) $file;
    return $this;
  }
  /**
  *este metodo faz o tratamento do Upload
  *desde que ja esteja setado ficheiro e a pasta
  **/
  public function startUpload()
  {
      if(!empty($this->file))
      {
        foreach ($this->file["name"] as $key => $name)
        {
          if($this->file["error"][$key] ===0)
          {
            $tmp = $this->file["tmp_name"][$key];

            $extra = explode(".",$name);
            $extra = strTolower(end($extra));
            $arquive = md5_file($tmp).time().".".$extra;

            if(in_array($extra,$this->type) === true && move_uploaded_file($tmp,$this->path."/".$arquive)===true)
              {
                $this->success[] =
                [
                  "BeforeName" => $name,
                  "NewName" => $arquive,
                  "Url" => $this->path."/".$arquive
                ];
              }
              else
              {
                $this->failed[] =
                [
                  "beforeName" => $name
                ];
              }
          }
        }
      }
      return $this;
  }
  /**
  * this method return success  or failed of data
  *@return type: Json
  **/
  public function getJson()
  {
    return json_encode
    ([
      "success" => $this->success,
      "failed"  => $this->failed
    ]);
  }
}
