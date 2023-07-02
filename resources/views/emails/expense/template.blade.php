<h1>Olá <b>{{$expense->user->name}}</b></h1>
<p>Uma nova despesa foi cadastrada em sua conta</p>
<table>
    <thead>
        <th>Descrição</th>
        <th>Valor</th>
    </thead>
    <tbody>
        <td>{{$expense->description}}</td>
        <td>{{$expense->value}}</td>
    </tbody>
</table>
