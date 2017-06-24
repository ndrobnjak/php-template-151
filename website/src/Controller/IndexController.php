<?php

namespace ndrobnjak\Controller;

use ndrobnjak\SimpleTemplateEngine;

class IndexController 
{
  /**
   * @var ndrobnjak\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param ndrobnjak\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template)
  {
     $this->template = $template;
  }

  public function homepage() {
    echo $this->template->render("home.html.php");
 //   echo $_SESSION['email'];
  }

  public function greet($name) {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
}
