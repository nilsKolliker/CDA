using System;
using System.Collections.Generic;

#nullable disable

namespace crudTextCsharp.Dtos.Models
{
    public partial class UtilisateurDTOin
    {
        public string Nom { get; set; }
        public string Prenom { get; set; }
        public string AdresseMail { get; set; }
        public string MotDePasse { get; set; }
        public int Role { get; set; }
    }

    public partial class UtilisateurDTOout
    {
        public int IdUtilisateur { get; set; }
        public string Nom { get; set; }
        public string Prenom { get; set; }
        public string AdresseMail { get; set; }
        public string MotDePasse { get; set; }
        public int Role { get; set; }
    }
}
