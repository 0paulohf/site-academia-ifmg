
from django.contrib import admin
from django.contrib.auth.admin import UserAdmin
from django.contrib.auth.forms import UserCreationForm, UserChangeForm
from .models import Usuario


class UsuarioCreationForm(UserCreationForm):
    class Meta:
        model = Usuario
        fields = ('identificador', 'first_name', 'last_name', 'email', 'perfil')


class UsuarioChangeForm(UserChangeForm):
    class Meta:
        model = Usuario
        fields = '__all__'


@admin.register(Usuario)
class UsuarioAdmin(UserAdmin):
    add_form = UsuarioCreationForm
    form = UsuarioChangeForm
    model = Usuario

    list_display = (
        'identificador',
        'first_name',
        'last_name',
        'perfil',
        'is_active',
    )

    list_filter = ('perfil', 'is_active', 'is_staff')

    ordering = ('identificador',)

    fieldsets = (
        (None, {'fields': ('identificador', 'password')}),
        ('Informações pessoais', {
            'fields': ('first_name', 'last_name', 'email', 'perfil')
        }),
        ('Permissões', {
            'fields': (
                'is_active',
                'is_staff',
                'is_superuser',
                'groups',
                'user_permissions',
            )
        }),
        ('Datas importantes', {'fields': ('last_login', 'date_joined')}),
    )

    add_fieldsets = (
        (None, {
            'classes': ('wide',),
            'fields': (
                'identificador',
                'first_name',
                'last_name',
                'email',
                'perfil',
                'password1',
                'password2',
            ),
        }),
    )
