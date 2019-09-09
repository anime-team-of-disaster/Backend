from django import forms
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth.models import User
class SignupForm(UserCreationForm):
    # email = forms.EmailField(max_length=200, help_text='Required')  class Meta:
    email = forms.CharField(required=True, widget=forms.EmailInput(attrs={'class': 'validate',}))
    model = User
    fields = ('username', 'email', 'password1', 'password2')