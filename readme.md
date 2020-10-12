# WP_CLI_Helper
A small WP_CLI abstract to ensure all command responsibilities and information are self-contained.

## What does this solve
Wraps your command's namespace and registration arguments into a single class. Turns:

```
$namespace = 'hello';
$args = [
    'shortdesc' => 'Says hello',
];
WP_CLI::add_command($namespace, 'MyCommand', $args);
```

into

```
MyCommand::register();
```

## Usage
Your command class should follow the [conventions laid out in the WP-CLI docs](https://make.wordpress.org/cli/handbook/guides/commands-cookbook/#wp_cliadd_commands-third-args-parameter) for defining a command as a class. Addtionally, it should extend this helper, define its namespace, optionally define an `$args` property, and either the `__invoke()` magic method or class methods, which are registered by WP-CLI as sub-commands.

```
<?php 

class MyCommand extends \SternerStuff\WP_CLI_Helper\WP_CLI_Command {

    public $namespace = 'say';

    public function hello()
    {
        echo 'Hello';
    }

}