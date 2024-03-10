<h2>Olá {{$data[0]}}</h2>
<hr>

VocÊ está recebendo a cobrança de número {{$data[5]}}

<p>Vencimento: {{$data[4]}}</p>
<p>Valor: R$ {{number_format($data[3], 2, ',', '.')}}</p>
