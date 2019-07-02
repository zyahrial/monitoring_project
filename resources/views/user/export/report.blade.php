<html>
<table class="table table-bordered " style="font-size:12px; color: black;">
    <tbody>
      <tr>
        <td style="background-color: #FFFF00;"></td>
            <td style="background-color: #FFFF00;"  width="40px"><strong>NAMA</strong></td>
            <td style="background-color: #FFFF00;"  width="40px"><strong>ROLE</strong></td>
            <td style="background-color: #FFFF00;"  width="40px"><strong>EMAIL</strong></td>
            </tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        @foreach ($users as $data)
<tr >
            <td>{{$no++}}</td>
            <td >{{ $data->name }} </td>
            @if ($data->is_permission == '2')
@php ($role = "SUPERADMIN")
            @elseif ($data->is_permission == '1')
@php ($role = "ADMIN")
            @else
@php ($role = "USER")
            @endif
            <td>{{ $role }}</td>
            <td >{{ $data->email }}</td>
</tr>
@endforeach
</tbody>
</table>
</html>