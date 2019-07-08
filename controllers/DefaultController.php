<?php
    class DefaultController
    {
        var $vars = [];
        var $layout = "head";

        function set($data)
        {
            $this->vars = array_merge($this->vars, $data);
        }

        function render($filename)
        {
            // Extract array value $key in vars
            extract($this->vars);

            // Buffer view filename path mapping
            ob_start();
            require(ROOT . "views/" . $filename . '.php');

            $viewContent = ob_get_clean();

            if ($this->layout == false) {
                // Render view
                $viewContent;   
            } else {
                // Render default
                require(ROOT . "views/layouts/" . $this->layout . '.php');
            }
        }

    }
?>