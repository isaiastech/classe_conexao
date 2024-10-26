<?php

$envPath = realpath(dirname(__FILE__,2) . '/../../env.ini');
if ($envPath) {
    echo "Caminho do env.ini: $envPath";
} else {
    echo "Erro: O arquivo 'env.ini' não foi encontrado.";
}
