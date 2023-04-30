<?php

function generateNestedArray(array $data, $parentId = null, $idField = 'id', $parentIdField = 'parent_id', $childrenField = 'children')
{
    $result = [];

    foreach ($data as $item) {
        if ($item[$parentIdField] == $parentId) {
            $item[$childrenField] = generateNestedArray($data, $item[$idField], $idField, $parentIdField, $childrenField);
            $result[] = $item;
        }
    }

    return $result;
}