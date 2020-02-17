let SessionLoad = 1
if &cp | set nocp | endif
let s:so_save = &so | let s:siso_save = &siso | set so=0 siso=0
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd /srv/http/little-french-ratings
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
set shortmess=aoO
argglobal
%argdel
edit resources/views/establishment/index.blade.php
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
set nosplitbelow
set nosplitright
wincmd t
set winminheight=0
set winheight=1
set winminwidth=0
set winwidth=1
exe 'vert 1resize ' . ((&columns * 136 + 135) / 271)
exe 'vert 2resize ' . ((&columns * 134 + 135) / 271)
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 49 - ((48 * winheight(0) + 34) / 69)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
49
let s:c = 137 - ((64 * winwidth(0) + 68) / 136)
if s:c > 0
  exe 'normal! ' . s:c . '|zs' . 137 . '|'
else
  normal! 0137|
endif
wincmd w
argglobal
if bufexists("resources/sass/navbarDroppable.scss") | buffer resources/sass/navbarDroppable.scss | else | edit resources/sass/navbarDroppable.scss | endif
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 84 - ((52 * winheight(0) + 34) / 69)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
84
normal! 0
wincmd w
exe 'vert 1resize ' . ((&columns * 136 + 135) / 271)
exe 'vert 2resize ' . ((&columns * 134 + 135) / 271)
tabnext 1
badd +46 app/Models/Establishment.php
badd +41 app/Models/Plate.php
badd +1 resources/views/establishment/create.blade.php
badd +1 resources/views/establishment/index.blade.php
badd +1 resources/views/auth/login.blade.php
badd +1 resources/sass/app.scss
badd +23 app/Http/Controllers/EstablishmentController.php
badd +1 app/Http/Controllers/UserController.php
badd +49 /srv/http/balance-manager/app/Models/Category.php
badd +0 resources/sass/navbarDroppable.scss
if exists('s:wipebuf') && len(win_findbuf(s:wipebuf)) == 0
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20 shortmess=filnxtToOSIc
set winminheight=1 winminwidth=1
let s:sx = expand("<sfile>:p:r")."x.vim"
if file_readable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &so = s:so_save | let &siso = s:siso_save
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
