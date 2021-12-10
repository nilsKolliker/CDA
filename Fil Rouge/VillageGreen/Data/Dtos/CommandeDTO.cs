using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Dtos
{
    public partial class CommandeDTOIn
    {
        public string NumeroCommande { get; set; }
        public DateTime DateCommande { get; set; }
        public int IdUser { get; set; }
        public int IdAdresse { get; set; }
    }
    public partial class CommandeDTOOut
    {
        public int IdCommande { get; set; }
        public string NumeroCommande { get; set; }
        public DateTime DateCommande { get; set; }
        public int IdUser { get; set; }
        public string RefClient { get; set; }
        public int IdCategorieClient { get; set; }
        public string InfoReglement { get; set; }
        public int IdAdresse { get; set; }
        public string AdressePostale { get; set; }
        public string Province { get; set; }
        public string ComplementAdresse { get; set; }
        public int IdVille { get; set; }
        public string CodePostal { get; set; }
    }
    public partial class CommandeDetailDTOOut
    {
        public int IdCommande { get; set; }
        public string NumeroCommande { get; set; }
        public DateTime DateCommande { get; set; }
        public int IdUser { get; set; }
        public string RefClient { get; set; }
        public int CoefClient { get; set; }
        public int IdCategorieClient { get; set; }
        public string LibelleCategClient { get; set; }
        public string InfoReglement { get; set; }
        public int IdAdresse { get; set; }
        public string EmailAdresse { get; set; }
        public string TelMobile { get; set; }
        public string TelFixe { get; set; }
        public string AdressePostale { get; set; }
        public string Province { get; set; }
        public string ComplementAdresse { get; set; }
        public int IdVille { get; set; }
        public string LibelleVille { get; set; }
        public string CodePostal { get; set; }
        public int IdPays { get; set; }
        public string NomPays { get; set; }
    }
}
