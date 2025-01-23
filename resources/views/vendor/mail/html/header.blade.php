@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://media-hosting.imagekit.io//1911856b4d544b45/Desain_tanpa_judul-removebg-preview.png?Expires=1832220436&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=HT34RH9VsvzahhXU3XnzZv34nzrbmuzXnFuC9-qAll7hdqzfcMJJ-0b~dihk1GuWC-8gSSK5J0b6T2jZQV693DI9P0Q0KlAV4FWtb9MWiuBYXyCYVPTqwFs09IXg0571YeYTcgUjBTFssQhMCn15rLqxqowbwCVci9TjlC4fiTC7Cf~uAzKdiyLSjR0bLjUKlG8rW1NeTqdsnc-2YeBg1HeXlmHNfWoUcWqXrg0VDuoybvueDFUwlQd47bKP2jpUq4ZCDkX7~vE1DzbXSOXJ~il6OpwfSU1huTEgkfwuLYTSHcXzDEKH0fe3FJ1lAPua05267NQz3qEv6AdUul0E6w__" style="width: 200px; height: auto;" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>