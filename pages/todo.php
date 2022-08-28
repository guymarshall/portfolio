<?php

require 'page.php';

$content = '';

$content .= '<body>
  <div class="form-group container col-sm-4" id="inputFields">
    <input autocomplete="off" type="text" class="form-control" id="todo" placeholder="Enter todo">
    <small id="todoHelp" class="form-text text-muted">Try and be as descriptive as possible!</small>
    <input type="button" class="btn btn-primary" onclick="addTodo();" value="Add">
    <input type="button" class="btn btn-danger" onclick="clearTodos();" value="Clear">
  </div>
  <hr>
  <ol id="todoList"></ol>
</body>';


$o_todo_page = new Page();
$todo_html = $o_todo_page->create_page('Todo', $content);
echo $todo_html;