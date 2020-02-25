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
edit resources/views/plate/show.blade.php
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
exe 'vert 1resize ' . ((&columns * 113 + 113) / 227)
exe 'vert 2resize ' . ((&columns * 113 + 113) / 227)
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
let s:l = 19 - ((6 * winheight(0) + 21) / 43)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
19
normal! 061|
lcd /srv/http/little-french-ratings
wincmd w
argglobal
if bufexists("/srv/http/little-french-ratings/resources/views/establishment/show.blade.php") | buffer /srv/http/little-french-ratings/resources/views/establishment/show.blade.php | else | edit /srv/http/little-french-ratings/resources/views/establishment/show.blade.php | endif
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 62 - ((41 * winheight(0) + 21) / 43)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
62
normal! 022|
lcd /srv/http/little-french-ratings
wincmd w
exe 'vert 1resize ' . ((&columns * 113 + 113) / 227)
exe 'vert 2resize ' . ((&columns * 113 + 113) / 227)
tabnext 1
badd +74 /srv/http/balance-manager/resources/views/home.blade.php
badd +87 /srv/http/little-french-ratings/resources/views/plate/show.blade.php
badd +7 /srv/http/little-french-ratings/app/Models/Establishment.php
badd +6 /srv/http/little-french-ratings/app/Models/Plate.php
badd +82 /srv/http/little-french-ratings/app/Http/Controllers/EstablishmentController.php
badd +24 /srv/http/little-french-ratings/resources/views/plate/index.blade.php
badd +53 /srv/http/little-french-ratings/app/Http/Controllers/PlateController.php
badd +1 /srv/http/little-french-ratings/app/Models
badd +3 /srv/http/ginger-store/resources/views/product/product.blade.php
badd +1 /srv/http/little-french-ratings/resources/views/establishment/show.blade.php
if exists('s:wipebuf') && len(win_findbuf(s:wipebuf)) == 0
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20 shortmess=filnxtToOS
set winminheight=1 winminwidth=1
let s:sx = expand("<sfile>:p:r")."x.vim"
if file_readable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &so = s:so_save | let &siso = s:siso_save
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
