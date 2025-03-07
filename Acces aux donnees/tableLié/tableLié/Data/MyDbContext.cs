﻿using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Models;

namespace tableLié.Data
{
    public class MyDbContext : DbContext
    {
        public DbSet<Departement> Departement { get; set; }
        public DbSet<Ville> Ville { get; set; }
        public MyDbContext(DbContextOptions<MyDbContext> options) : base(options)
        {
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Ville>()
                .HasOne<Departement>(v => v.Departement)
                .WithMany(d => d.Ville)
                .HasForeignKey(v => v.IdDepartement);
        }
    }
}
