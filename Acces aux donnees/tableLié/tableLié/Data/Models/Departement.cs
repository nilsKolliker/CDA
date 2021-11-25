using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace tableLié.Data.Models
{
    public partial class Departement
    {
        [Key]
        public int IdDepartement { get; set; }
        public string Libelle { get; set; }
    }
}
