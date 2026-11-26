
from django.db import models
from django.contrib.auth.models import AbstractUser, BaseUserManager


class UsuarioManager(BaseUserManager):
    def create_user(self, identificador, password=None, **extra_fields):
        if not identificador:
            raise ValueError('O identificador é obrigatório.')

        user = self.model(identificador=identificador, **extra_fields)
        user.set_password(password)
        user.save(using=self._db)
        return user

    def create_superuser(self, identificador, password=None, **extra_fields):
        extra_fields.setdefault('is_staff', True)
        extra_fields.setdefault('is_superuser', True)
        extra_fields.setdefault('is_active', True)
        extra_fields.setdefault('perfil', 'administrador')

        if extra_fields.get('is_staff') is not True:
            raise ValueError('Superusuário precisa ter is_staff=True.')

        if extra_fields.get('is_superuser') is not True:
            raise ValueError('Superusuário precisa ter is_superuser=True.')

        return self.create_user(identificador, password, **extra_fields)


class Usuario(AbstractUser):
    username = None

    identificador = models.CharField(
        max_length=50,
        unique=True
    )

    PERFIS = [
        ('aluno', 'Aluno'),
        ('instrutor', 'Professor'),
        ('administrador', 'Administrador'),
    ]

    perfil = models.CharField(
        max_length=20,
        choices=PERFIS,
        default='aluno'
    )

    objects = UsuarioManager()

    USERNAME_FIELD = 'identificador'
    REQUIRED_FIELDS = []
