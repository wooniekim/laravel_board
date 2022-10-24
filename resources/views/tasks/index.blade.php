@extends('layouts.task_layout')

@section('title')
    게시판
@endsection

@section('style')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 20px 20px -15px 20px;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            background-color: tomato;
        }
    </style>
@endsection

@section('content')
    <h1>자유게시판</h1>
    <small><?= $totalCount ?>개의 글이 있습니다.
        <?= $pageNum ?>페이지 입니다.</small>
    <table>
        <tr>
            <th>ID</th>
            <th>글</th>
            <th>닉네임</th>
            <th>시간</th>
            <th></th>
        </tr>
        @foreach ($comments as $comment)
            <tr>
                <td>
                    {{ $comment->id }}
                </td>
                <td>
                    @if ($comment->depth == 0)
                        {{ $comment->memo }}
                    @else
                        @for ($i = 0; $i < $comment->depth; $i++)
                            &nbsp&nbsp
                        @endfor
                        └{{ $comment->memo }}
                    @endif
                </td>
                <td>
                    {{ $comment->creator_name }}
                </td>
                <td>
                    {{ $comment->created_at }}
                </td>
                <td>
                    <form style="float:left; margin-right:10px;" action="tasks/create" method="GET">
                        <button
                            onClick="commentInfo({{ $comment->id }},{{ $comment->grp }}
        	,{{ $comment->sort }},{{ $comment->depth }})">댓글달기</button>
                        <input type="hidden" name="mode" value="0">
                        <input type="hidden" class="id" name="id" value="">
                        <input type="hidden" class="grp" name="grp" value="">
                        <input type="hidden" class="sort" name="sort" value="">
                        <input type="hidden" class="depth" name="depth" value="">
                        <input type="hidden" name="page" value="<?= $pageNum ?>">
                    </form>
                    <form action="/tasks" method="GET" style="float:left;">
                        <input type="submit" value="삭제하기">
                        <input type="hidden" name="del" value="1">
                        <input type="hidden" name="delId" value="{{ $comment->id }}">
                        <input type="hidden" name="page" value="{{ $pageNum }}">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="tasks/create" method="GET">
        <button style="margin-top:20px;">글쓰기</button>
        <input type="hidden" name="mode" value="1">
        <input type="hidden" name="page" value="{{ $pageNum }}">
    </form>

    <a href="/tasks?pageNum={{ $startPage }}">
        <<< /a>
            <?php if($pageNum == 1)
    {
    echo "";
    }
    else
    { ?>
            <a href="/tasks?page={{ $pageNum - 1 }}">
                << /a>
                    <?php } ?>
                    <?php for($i=$startPage; $i<=$endPage; $i++)
    { ?>
                    <a href="/tasks?page=<?= $i ?>"><?= $i ?></a>
                    <?php } ?>
                    <?php if($pageNum == $totalPage)
    { 
    echo "";
    }
    else 
    { ?>
                    <a href="/tasks?page={{ $pageNum + 1 }}">></a>
                    <?php } ?>
                    <a href="/tasks?page={{ $endPage }}">>></a><br>

                @section('script')
                    <script>
                        function commentInfo(id, grp, sort, depth) {
                            $('.id').val(id);
                            $('.grp').val(grp);
                            $('.sort').val(sort);
                            $('.depth').val(depth);
                        };
                    </script>
                @endsection
            @endsection
