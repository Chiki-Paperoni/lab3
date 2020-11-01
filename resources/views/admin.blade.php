<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>lab1</title>

        <style>
            table span {
                margin-right:8px;
            }
        </style>
    </head>
    <body class="">

        <h3>Page list</h3>

        <table>
            <tr>
                <td>URL</td>
                <td>parentCode</td>
                <td>orderNum</td>
                <td>CAPTION</td>
                <td>CREATED</td>
                <td>EDITED</td>
                <td>ID</td>
            </tr>
            @foreach($pagesList as $page)
            <tr>
            
                <td><span>{{$page->url}}</span></td>
                <td><span>{{$page->parentCode}}</span></td>
                <td><span>{{$page->orderNum}}</span></td>
                <td><span>{{$page->caption}}</span></td>
                <td><span>{{$page->createdDate}}</span></td>
                <td><span>{{$page->editedDate}}</span></td>
                <td><span>{{$page->id}}</span></td>
                @if($page->url != 'default')
                <td><span><a href='http://localhost/lab1/public/admin/edit/{{$page->id}}'><button>Edit</button></a></span></td>
                <td style="display:flex"><span><form action="{{url('deletePage')}}" method="POST">
                    @csrf
                    <input type="text" name='id' style="display:none" value='{{$page->id}}'>
                    <input type="submit" id="form-submit" value="Delete">
                </form></span></td>
                
                <td><span><a href="{{route('chi')}}/{{$page->url}}"><button>children</button></a></span></td>
               <td><span><a href="{{url($page->url)}}"><button>View</button></a></span></td>
               @endif
            </tr>           
                  
       @endforeach
        </table>

        <span><a href="{{route('new')}}"><button> Add new</button></a></span>

    </body>
</html>
