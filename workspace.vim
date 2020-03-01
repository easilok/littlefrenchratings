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
edit app/Http/Controllers/PlateController.php
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
exe 'vert 1resize ' . ((&columns * 72 + 72) / 144)
exe 'vert 2resize ' . ((&columns * 71 + 72) / 144)
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
let s:l = 99 - ((5 * winheight(0) + 12) / 25)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
99
normal! 0
wincmd w
argglobal
if bufexists("app/Models/Images.php") | buffer app/Models/Images.php | else | edit app/Models/Images.php | endif
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 38 - ((14 * winheight(0) + 12) / 25)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
38
normal! 05|
wincmd w
2wincmd w
exe 'vert 1resize ' . ((&columns * 72 + 72) / 144)
exe 'vert 2resize ' . ((&columns * 71 + 72) / 144)
tabnext 1
badd +42 app/Models/Plate.php
badd +73 resources/views/plate/create.blade.php
badd +34 routes/web.php
badd +6 app/Http/Controllers/EstablishmentController.php
badd +191 resources/sass/app.scss
badd +1 app/Models/Establishment.php
badd +98 resources/views/plate/edit.blade.php
badd +89 app/Http/Controllers/PlateController.php
badd +26 resources/views/plate/index.blade.php
badd +67 resources/views/plate/show.blade.php
badd +94 resources/views/establishment/show.blade.php
badd +0 app/Models/Images.php
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
