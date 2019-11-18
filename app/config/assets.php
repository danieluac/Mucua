<?php
namespace app\config;

class assets
{
  protected function asset($asset)
  {
      $asset = str_replace('../','', $asset);

      return defined::HOST_PUBLIC.'assets/'.$asset;
  }
}
