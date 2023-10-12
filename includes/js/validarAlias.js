function validarAlias(alias) {
    const patron = /^(?=.*[a-zA-Z])(?=.*\d).{5,}$/;
    return patron.test(alias);
}

