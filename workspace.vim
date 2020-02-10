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
edit resources/views/auth/login.blade.php
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
exe 'vert 1resize ' . ((&columns * 135 + 135) / 271)
exe 'vert 2resize ' . ((&columns * 135 + 135) / 271)
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
let s:l = 50 - ((49 * winheight(0) + 35) / 70)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
50
normal! 0
lcd /srv/http/little-french-ratings
wincmd w
argglobal
if bufexists("/srv/http/little-french-ratings/resources/views/auth/passwords/confirm.blade.php") | buffer /srv/http/little-french-ratings/resources/views/auth/passwords/confirm.blade.php | else | edit /srv/http/little-french-ratings/resources/views/auth/passwords/confirm.blade.php | endif
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 39 - ((38 * winheight(0) + 35) / 70)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
39
normal! 012|
lcd /srv/http/little-french-ratings
wincmd w
2wincmd w
exe 'vert 1resize ' . ((&columns * 135 + 135) / 271)
exe 'vert 2resize ' . ((&columns * 135 + 135) / 271)
tabnext 1
badd +18 /srv/http/little-french-ratings/resources/views/auth/login.blade.php
badd +1 /srv/http/little-french-ratings/app/User.php
badd +1 /srv/http/little-french-ratings/resources/views/layouts/app.blade.php
badd +1 /srv/http/little-french-ratings/resources/sass/app.scss
badd +1 /srv/http/little-french-ratings/resources/sass/_variables.scss
badd +1 /srv/http/little-french-ratings/app/Models/Role.php
badd +1 /srv/http/little-french-ratings/routes/web.php
badd +1 /srv/http/little-french-ratings/resources/js/components/plugins
badd +12 /srv/http/little-french-ratings/resources/views/user/index.blade.php
badd +59 /srv/http/little-french-ratings/app/Http/Controllers/UserController.php
badd +65 /srv/http/little-french-ratings/resources/views/user/change_password.blade.php
badd +5 /srv/http/little-french-ratings/resources/views/auth/verify.blade.php
badd +51 /srv/http/little-french-ratings/resources/views/auth/passwords/reset.blade.php
badd +1 /srv/http/little-french-ratings/resources/views/auth/passwords
badd +45 /srv/http/little-french-ratings/resources/views/user/register.blade.php
badd +22 /srv/http/little-french-ratings/resources/views/auth/passwords/email.blade.php
badd +0 /srv/http/little-french-ratings/resources/views/auth/passwords/confirm.blade.php
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
