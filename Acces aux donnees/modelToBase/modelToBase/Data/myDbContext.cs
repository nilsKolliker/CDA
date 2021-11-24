using Microsoft.EntityFrameworkCore;
using modelToBase.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace modelToBase.Data
{
    public class myDbContext : DbContext
    {
        public DbSet<Departement> Departements { get; set; }
        public DbSet<Ville> Villes { get; set; }
        public myDbContext( DbContextOptions<myDbContext> options) : base(options)
        {
        }
    }
}
