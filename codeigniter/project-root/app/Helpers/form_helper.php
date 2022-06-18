<?php

function mostra_erro($validation, $field)
{
  if ($validation->hasError($field)) {
    return $validation->getError($field);
  } else {
    return false;
  }
}
