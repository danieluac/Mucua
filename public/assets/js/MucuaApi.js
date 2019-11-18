/*!
* QueroBukar (http://QueroBukar.com)
*
* @AUTHOR: Antonio Cordeiro (AC)
*
* @GITHUB: https://www.github.com/danieluac
*
* @EMAIL: antoniocordeiro228@gmail.com
* Copyright 2017 ++ QUeroBukar
* this api is propriety (c) Artisan Startup
*/

var MucuaApi = function()
{
  var getUrl,getFormData,opcoes;


  getFormData = function (source)
  {
    if(opcoes.type==="post" || opcoes.type==="Post")
      {
        $.post(getUrl,source, function( _response ) {
          if(typeof opcoes.finished === "function")
          { setTimeout(function(){opcoes.finished(_response);},opcoes.time); }
        }, "json").fail(function(){
            if(typeof opcoes.failed === "function")
            {opcoes.failed();}
        }).always(function(){
            if(typeof opcoes.progress === "function")
            {opcoes.progress();}
        });
      }else {
        if(opcoes.type==="get" || opcoes.type==="Get")
        {
          $.get(getUrl,source, function( _response ) {
              if(typeof opcoes.finished === "function")
              { setTimeout(function(){opcoes.finished(_response);},opcoes.time); }
          }, "json").fail(function(){
              if(typeof opcoes.failed === "function")
              {opcoes.failed();}
          }).always(function(){
              if(typeof opcoes.progress === "function")
              {opcoes.progress();}
          });
        }else{}
      }
  };
  this.setData = function(opcao)
  {
    opcoes = opcao;
    if(opcoes.url !== undefined)
    {
      getUrl =opcoes.url;
    }
    if(opcoes.formD !== undefined)
    {
      getFormData(opcoes.formD);
    }
  };
};
