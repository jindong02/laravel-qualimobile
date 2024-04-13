<!DOCTYPE html>
<html>
    <body>
        <h1>{{ ucfirst(strtolower(preg_replace("/\s.*/", '', ltrim($form->nome)))) }} entrou em contato</h1>

        <ul>
            <li>Nome: {{ strtoupper($form->nome) }}</li>
            <li>Email: {{ $form->email }}</li>
            <li>Telefone: {{ $form->telefone }}</li>
            <li>Tipo de Uso: {{ $form->tipo }}</li>
            <li>Eu sou: {{ $form->eusou }}</li>
            <li>Como conheceu a QualiMobile: {{ $form->como }}</li>
            <li>Estado: {{ $form->estado }}</li>
            <li>Cidade: {{ $form->cidade }}</li>

            <li>Mensagem: <p>{{ $form->mensagem }}</p></li>
        </ul>

    </body>
</html>
