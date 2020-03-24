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
edit resources/js/components/Rating.vue
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
exe 'vert 1resize ' . ((&columns * 99 + 99) / 199)
exe 'vert 2resize ' . ((&columns * 99 + 99) / 199)
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
let s:l = 23 - ((22 * winheight(0) + 23) / 46)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
23
normal! 076|
wincmd w
argglobal
if bufexists("resources/views/establishment/create.blade.php") | buffer resources/views/establishment/create.blade.php | else | edit resources/views/establishment/create.blade.php | endif
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 21 - ((20 * winheight(0) + 23) / 46)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
21
normal! 0
wincmd w
exe 'vert 1resize ' . ((&columns * 99 + 99) / 199)
exe 'vert 2resize ' . ((&columns * 99 + 99) / 199)
tabnext 1
badd +135 app/Http/Controllers/TasteController.php
badd +99 app/Http/Controllers/PlateController.php
badd +19 resources/views/rating/create.blade.php
badd +28 resources/js/components/Rating.vue
badd +354 resources/sass/app.scss
badd +1 resources/js/components/ImageSlideShow.vue
badd +8 resources/views/taste/index.blade.php
badd +20 resources/js/app.js
badd +1 resources/views/plate/show.blade.php
badd +69 resources/sass/ratings.scss
badd +25 database/migrations/2020_02_02_185459_create_ratings_table.php
badd +133 app/Http/Controllers/EstablishmentController.php
badd +64 routes/web.php
badd +24 app/Models/PlateRating.php
badd +1 resources/views/establishment/create.blade.php
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
nohlsearch
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
